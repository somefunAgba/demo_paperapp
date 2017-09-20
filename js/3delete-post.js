// Bootstraps
var WPAPI = require ( 'wpapi' );

const config = require('../json/config.json');

var wp = new WPAPI({
    endpoint : config.endpoint,
    username : config.username,
    password : config.password,
    auth : true
});

// update post is used ona single post
// so need to get post id

var postId = 3;

// what would be deleted is optional from
// only 1 property to many
wp.posts().id(postId).delete()
    .then(function (response) {
    console.log(response);
}).catch(function (err) {
    console.error(err);
});

// response or data holds all properties of the created object
// create a post // then do something with its response // catch error