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

var postId = 1;


// what would be updated is optional from
// only 1 property to many
wp.posts().id(postId).update({
    title: 'updated title',
    status: 'publish',
    excerpt: 'excerpt new',
    content: "new content"
}).then(function (response) {
    console.log(response);
}).catch(function (err) {
    console.error(err);
});

// response or data holds all properties of the created object
// create a post // then do something with its response // catch error