# Api-Assignment

CONTENTS OF THIS FILE
---------------------

 * [Introduction](https://github.com/omkar-yewale/Api-Assignment#introduction)
 * [Requirements](https://github.com/omkar-yewale/Api-Assignment#requirements)
 * [Installation](https://github.com/omkar-yewale/Api-Assignment#installation)
 * [Configuration](https://github.com/omkar-yewale/Api-Assignment#configuration)
 * [Other Details](https://github.com/omkar-yewale/Api-Assignment#other-details)
 * [Resources](https://github.com/omkar-yewale/Api-Assignment#resources)
 
 INTRODUCTION
------------
A Custom Rest API module is used to add api key field in config form and and save,update this APK key in the database.

Using this key we can get the Page node data in JSON format.

Make sure you have a assignment content type with data.

REQUIREMENTS
------------

This module requires no modules outside of the Drupal core.

INSTALLATION
------------

 * Install the Custom Rest API module as you would normally install a contributed
   Drupal module.
   
The configuration page is at /admin/config/custom_rest_api,
  where you can configure add or update API key.

CONFIGURATION
-------------

    1. Navigate to Administration > Extend and enable the module.
    2. Navigate to Administration > Configuration > System > Set API KEy
    3. Add APK key and update the configuration.
    
 * After updating configuration visit this URL : /data/dummyapikey/30
 
 Here,
 
 API key is: dummyapikey
 
 Node ID is: 30
 
 if the node id and API key both are valid you will get the result.
 
 Other Details
---------------
Other Task is add node using psotman.

 To add a node in Assignmnet content type need to eneble some modules.
 
    1. Rest WebService
    2. RestUI
 
After installing both the module go to the > /admin/config/services/rest

and update configuration with GET,PUSH method from the content. 
    
After updating configuration Download the [Postman Application](https://www.postman.com/downloads/) and Create new connection.

In that Connection use POST method and site URL with parameter. Ex (http://drupal-assginment.docker.localhost:8007/node?_format=json)
And body Section add your json data for creating new node.

Ex: 

{

    "title":[{"value":"new testing Content"}],
    
    "type":[{"target_id":"assignment"}],
    
    "body":[{"value":"hello hello testing"}],
    
    "field_category":[{"target_id": "5"}]
    
}

 
 RESOURCES
-------------
   - [Add Custom config form](https://www.drupal.org/docs/drupal-apis/configuration-api/working-with-configuration-forms)
   - [JSON Response](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x)
   - [Create Node Throgh postman](https://www.cloudways.com/blog/create-drupal-8-node-using-restful-web-services/)
 
