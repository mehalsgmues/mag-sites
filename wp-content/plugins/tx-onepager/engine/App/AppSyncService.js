const $     = jQuery;
const async = require('async');
const notify             = require('./../shared/plugins/notify');
const ODataStore         = require('./../shared/onepager/ODataStore');
const AppActions         = require('./flux/AppActions');

import {serializeSections}  from './../shared/onepager/sectionTransformer';

function AppSyncService(pageId, inactive, shouldSectionsSync) {

  let updateSection = function (sections, sectionIndex) {
    return new Promise( (resolve, reject) => {

      let payload = {
        pageId  : pageId,
        action  : 'onepager_save_sections',
        updated : sectionIndex,
        sections: serializeSections(sections)
      };

      let sync = function () {
        $.post(ODataStore.ajaxUrl, payload, (res)=> {
          if (!res || !res.success) {
            return notify.error('Unable to sync. Make sure you are logged in');
          }
          //else
          AppActions.sectionSynced(sectionIndex, res);

          if (pageId) {
            notify.success('Sync Successful');
          }
          /**
           * return promise 
           * after success or 
           * reject on faliur
           */
          return res.success ? resolve(res.success): reject('Unable to sync. Make sure you are logged in');

        });
      };

      async.series([
        (pass)=> inactive().then(pass, (err)=>console.log(err)),
        (pass)=> shouldSectionsSync(sections).then(pass),
        (pass)=> sync(pass)
      ]);

    });

  };

  let mergeSections = function (sections) {
    return new Promise( (resolve, reject) => {

      let payload = {
        pageId  : pageId,
        action  : 'onepager_merge_sections',
        sections: sections
      };

      let sync = function () {
        $.post(ODataStore.ajaxUrl, payload, (res)=> {
          if (!res || !res.success) {
            notify.error('Unable to sync. Make sure you are logged in');
            return reject('Unable to sync. Make sure you are logged in');
          }
          //else
          AppActions.sectionsShouldSynced(res);

          if (pageId) {
            notify.success('Sync Successful');
          }
          /**
           * return promise 
           * after success or 
           * reject on faliur
           */
          return res.success ? resolve(res.success): reject('Unable to sync. Make sure you are logged in');

        });
      };

      async.series([
        (pass)=> inactive().then(pass, (err)=>console.log(err)),
        (pass)=> shouldSectionsSync(sections).then(pass),
        (pass)=> sync(pass)
      ]);
    
    })
    
  };

  let rawUpdate = function (sections) {

    return new Promise((resolve, reject)=> {

      let payload = {
        pageId  : pageId,
        action  : 'onepager_save_sections',
        updated : null,
        sections: serializeSections(sections)
      };

      let sync = function () {
        $.post(ODataStore.ajaxUrl, payload, (res)=> {
          if (!res || !res.success) {
            notify.error('Unable to save. Make sure you are logged in'); //bad message

            return reject('Unable to save. Make sure you are logged in'); //bad message
          }


          if (pageId) {
            notify.success('Page updated successfully');
          }
          return resolve();
        });
      };

      async.series([
        (pass)=> inactive().then(pass),
        (pass)=> shouldSectionsSync(sections).then(pass),
        (pass)=> sync(pass)
      ]);
    });

  };

  function updatePageSettings(sections){
    return new Promise((resolve, reject)=>{
      let payload = {
        action: "onepager_save_page_settings",
        pageId: pageId
      };

      $.post(ODataStore.ajaxUrl, payload, (res)=> {
        if (!res || !res.success) {
          notify.error('Unable to save. Make sure you are logged in'); //bad message

          return reject('Unable to save. Make sure you are logged in'); //bad message
        }

        console.log('res', res);

        return resolve('i am new to onepager, dont fire me');
      });

    });
  }

  function reloadSections(sections){
    return new Promise((resolve, reject)=>{
      let payload = {
        action: "onepager_reload_sections",
        sections: sections
      };

      $.post(ODataStore.ajaxUrl, payload, (res)=> {
        if (!res || !res.success) {
          notify.error('Unable to save. Make sure you are logged in'); //bad message

          return reject('Unable to save. Make sure you are logged in'); //bad message
        }

        if (pageId) {
          notify.success('Page reloaded');
        }

        return resolve(res.sections);
      });

    });
  }

  function reloadBlocks(){
    let payload = {
      action  : 'onepager_reload_blocks'
    };

    return new Promise((resolve, reject)=>{
      jQuery.post(ODataStore.ajaxUrl, payload, (res)=>{
        return res.success ? resolve(res.blocks) : reject("Could not load blocks");
      })
    });
  }

  function pageSyncServiceLive(pageSettingOptions, sectionsId){
    let payload = {
      action : 'onepager_save_page_settings_live',
      pageId : pageId,
      options: pageSettingOptions,
      sectionsId: sectionsId, 
    };

    return new Promise( (resolve, reject) => {
      jQuery.post(ODataStore.ajaxUrl, payload, (res)=> {
        return res.success 
        ? resolve(res) 
        : reject('something went wrong');
      })
    });
  }
  /**
   * export a page from builder 
   * @param {pageID}
   */
  function saveTemplate(pageID, name, type){
    var payload = {
			action: 'onepager_save_layout',
			pageID: pageID,
			name: name,
			type: type,
    };

    return new Promise((resolve, reject) => {
      jQuery.post(ODataStore.ajaxUrl, payload, (res) => {
        return res.success 
          ? resolve( res )
          : reject(res.message);
      });
    });
  }
  /**
   * delete a template from popup 
   * @param {pageID}
   */
  function deleteTemplate(id, name, type){
    var payload = {
			action: 'onepager_delete_layout',
			id: id,
			name: name,
			type: type,
    };
    return new Promise((resolve, reject) => {
      jQuery.post(ODataStore.ajaxUrl, payload, (res) => {
        return res.success 
          ? resolve( res )
          : reject('failed');
      });
    });
  }
  /**
   * export a page from builder 
   * @param {pageID}
   */
  function exportPage(pageId){
    var payload = {
			action: 'onepager_get_sections',
			pageId: pageId
    };

    return new Promise((resolve, reject) => {
      jQuery.post(ODataStore.ajaxUrl, payload, (res) => {
        return res.success 
          ? resolve( res )
          : reject("oops!! onepager could not export this page");
      });
    });
  }

  /**
   * import a exported json from builder
   * @param {*} jsonData 
   */
  function importJsonData(jsonData){
    var payload = {
			action: 'onepager_import_layout',
			data: jsonData
    };

    return new Promise((resolve, reject) => {
      jQuery.post(ODataStore.ajaxUrl, payload, (res) => {
        return res.insert_id 
          ? resolve( res )
          : reject("oops!! onepager could not import this page");
      });
    });
  }

  return {
    reloadSections,
    reloadBlocks,
    updateSection,
    mergeSections,
    rawUpdate,
    updatePageSettings,
    pageSyncServiceLive,
    exportPage,
    importJsonData,
    deleteTemplate,
    saveTemplate
  };
}


module.exports = AppSyncService;
