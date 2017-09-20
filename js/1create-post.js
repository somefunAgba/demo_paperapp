// Bootstraps
var WPAPI = require ( 'wpapi' );

const config = require('../json/config.json');

var wp = new WPAPI({
    endpoint : config.endpoint,
    username : config.username,
    password : config.password,
    auth : true
});
// any set global variable can be used to
// set their properties e.g const or var meti = 20
// title : '${meti}'

wp.posts().create({
    title : 'post title',
    content : 'post content',
    status : 'publish'
    // this properties can be passed in from a form
}).then(function (response) {
    console.log(response.id);
}).catch(function (err) {
    console.error(err);
});
// response or data holds all properties of the created object
// create a post // then do something with its response // catch error