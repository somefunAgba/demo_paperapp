// Bootstraps
var WPAPI = require ( 'wpapi' );

const config = require('../json/config.json');

var wp = new WPAPI({
    endpoint : config.endpoint,
    username : config.username,
    password : config.password,
    auth : true
});

wp.posts().create({
    title : 'post with image, tags and categories!',
    content : 'post content',
    categories : [1, 2],
    tags: [33, 71, 193],
    status : 'publish'
    // this properties can be passed in from a form
}).then(function ( data) {
    // create media record and upload the media
    var filePath = 'image file-path: ./images/owl.jpg';
    return wp.media().file( filePath).create({
        title : 'Amazing Media Image',
        post : data.id
    }).then(function ( media) {
        // set new media as post featured
        return wp.posts().id(data.id).update({
           featured_media: media.id,
           status: 'publish'
        });
    });

}).catch(function (err) {
    console.error(err);
});
// data holds all properties of the created or fetched post,
// media holds that of created or fetched media
// create a post // upload image // assign to post as featured// catch error