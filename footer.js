/*
wp.posts().embed().get().then(function (data) {
    console.log(data[0].title.rendered);
});
*/

jQuery(document).ready(function ($) {

        wp.settings().get().then(function (data) {
            // do something with returned data
            $("#coll1").text("WP REST-API . NODE-WPAPI . jQuery");

            $("#colr1").html(ft_js.theme);
            $("#colr2").html("Oluwasegun Somefun");
            //console.log(data);

        }).catch(function (err) {
            console.error(err);
        });


}); // jQuery Access

/*wp.users().me().then(function (me) {
    console.log('My name is ' + me.name + '!');
});*/
