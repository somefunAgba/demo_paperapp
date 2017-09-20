jQuery(document).ready(function ($) {

        // HTTP Request to WP using Jquery
        const endpoint = 'http://localhost:9090/wordpress/wp-json/wp/v2/posts?_embed';
        var thisPost = -1; var prePost = -2; var afterPost = 0;

        function populatePost(prev, curr, next) {
            const date = new Date(curr.date); //format date
            // swap out the html placeholders with content from WPAPI
            $(".api-post-title").html(curr.title.rendered);
            $(".api-post-meta__author").html(curr._embedded.author[0].name);
            $(".api-post-meta__date").html(date.toLocaleDateString());
            $(".api-post-content").html(curr.content.rendered);
            //$(".api-btn-prev").off('click');

            // for the first post
            if (prev && next) {
                $(".api-btn-prev").prop("disabled", false);
                $(".api-btn-prev").text(prev.title.rendered); // set the button text to title of prev post;
                $(".api-btn-next").prop("disabled", false);
                $(".api-btn-next").text(next.title.rendered); // set the button text to title of next post
            } else if ( !prev && next){
                $(".api-btn-prev").prop("disabled", true);
                $(".api-btn-prev").text(""); // set the button text to title of prev post
                $(".api-btn-next").text(next.title.rendered); // set the button text to title of next post
            } else if ( !next && prev) {
                $(".api-btn-next").prop("disabled", true);
                $(".api-btn-next").text(""); // set the button text to title of prev post
                $(".api-btn-prev").text(prev.title.rendered); // set the button text to title of prev post

            } else {
                // do nothing

            }
            window.scrollTo(0,0); // Go back to the Page top after loading
        }

        $.getJSON(endpoint, function (data) {
            //const getpost =data[thisPost]; // grabs most recent post
            // swap out the html placeholders with content from WPAPI
            populatePost(data[++prePost], data[++thisPost], data[++afterPost]);
            $(".api-btn-next").click(function () {
                populatePost(data[++prePost], data[++thisPost], data[++afterPost]);
            });
            $(".api-btn-prev").click(function () {
                populatePost(data[--prePost], data[--thisPost], data[--afterPost]);
            });
        });

});
