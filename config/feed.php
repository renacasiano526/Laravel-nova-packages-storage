<?php

return [
    'feeds' => [
        'recent' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => App\Package::class.'@getRecentFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feeds/recent',

            'title' => 'Recent Packages',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::feed',
        ],
    ],
];
