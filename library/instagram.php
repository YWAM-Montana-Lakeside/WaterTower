<?php

function instagram_object( $hashtag ) {

    /**
     *	By default instagram does not allow us to query for more than
     *	attribute, such as media posted by a specific author tagged with
     *	a specific tag. In order to accomplish this we will acquire all of
     *	the media tagged with the tag we are looking for and then filter it
     *	down based on the user.
     */

    // The tag you want to query
    $tag = $hashtag;

    /**
     *	Query variables for the CURL URL
     * 	For simple queries the client ID alone will suffice. 
     * 	We also need a very high number for the requested amount
     * 	of posts so that the App continues to give us a paginated
     * 	URL that allows us to iterate through all of the media.
     */
    $query = array(
        'client_id' => of_get_option('instagram_clientid'),
        'count'	    => 999999
    );

    // Set the url for the first iteration of the CURL
    $url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?".http_build_query($query);

    /**
     *	Instagram will only give us 33 posts at a time, so at the end of the CURL
     *	we will reset the $url using the next_url atribute in the pagination section
     *	of the returned object.
     */
    while ($url) {

        try {
            $curl_connection = curl_init($url);
            curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

            //Data are stored in $data
            $data = json_decode(curl_exec($curl_connection), true);
            curl_close($curl_connection);

            /**
             *	Loop through all of the posts retrieved in the latest CURL and assign
             * 	them to our $instagram_posts variable if they were authored by the user
             * 	we are looking for.
             */
            if ( !empty( $data['data'] ) ) {
                foreach ($data['data'] as $post_tag_match) {
                    if ( $post_tag_match['user']['username'] == 'ywammontanalakeside' ) {
                        $instagram_posts[] = $post_tag_match;
                    }
                }
            }

        } catch(Exception $e) {
            return $e->getMessage();
        }

        // Reset the $url variable using the next_url attribute.
        if (isset($data['pagination']['next_url'])) {
            $url = $data['pagination']['next_url'];
        } else {
            $url = null;
        }
    }
    
    return $instagram_posts;
}
?>