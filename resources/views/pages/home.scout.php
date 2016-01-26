@include('header')
<div id="app">
    <div class="wrapper">
        <div class="head">
            <h1>{{ __('Congratulations!', THEMOSIS_TEXTDOMAIN) }}</h1>
            <p>{{ __('The Themosis framework is running.', THEMOSIS_TEXTDOMAIN) }}</p>
            <a id="ajax-button" href="#">Click me!</a>
        </div>
        <p><?php var_dump(Option::get('newsletter-hebdo-posts', 'enable-registration')); ?></p>
        <p><?php var_dump(Option::get('newsletter-hebdo-posts', 'enable-notification')); ?></p>
        <p><?php var_dump(option::get('newsletter-hebdo-posts', 'report')); ?></p>
        <p><?php var_dump(option::get('newsletter-hebdo-posts', 'xyz')); ?></p>
        <p><?php var_dump(option::get('newsletter-hebdo-posts')); ?></p>
        <div class="form">
            {{ Form::open() }}
            {{ Form::text('nombg') }}
            {{ Form::checkbox('colors', ['r' => 'Choose this red color', 'b' => 'Blue', 'g' => 'Green'], [], ['class' => 'checkbox-class', 'label' => ['class' => 'custom-class']]) }}
            {{ Form::close() }}
        </div>
        <div class="form2">
            <h2>Form 2</h2>
            {{ Form::open(home_url()) }}
            {{ Form::close() }}
        </div>
        <div class="form3">
            <h2>Form 3</h2>
            {{ Form::open(wp_lostpassword_url()) }}
            {{ Form::close() }}
        </div>
        <div class="frame clearfix">
            <div id="get-started">
                <div class="container">
                    <h2>{{ __('Get started:', THEMOSIS_TEXTDOMAIN) }}</h2>
                    <p>{{ __('Check the documentation and build your next WordPress website/application.', THEMOSIS_TEXTDOMAIN) }}</p>
                    <a href="http://framework.themosis.com/docs/" target="_blank" title="{{ __('Themosis framework documentation', THEMOSIS_TEXTDOMAIN) }}">{{ __('View documentation', THEMOSIS_TEXTDOMAIN) }}</a>
                </div>
            </div>
            <div id="links">
                <div class="container">
                    <h3>{{ __('Links:', THEMOSIS_TEXTDOMAIN) }}</h3>
                    <ul>
                        <li><a href="http://framework.themosis.com" target="_blank" title="Themosis framework">Themosis framework</a></li>
                        <li><a href="https://github.com/themosis" target="_blank" title="GitHub - Themosis">GitHub</a></li>
                        <li><a href="https://twitter.com/Themosis" target="_blank" title="Twitter - Themosis">Twitter</a></li>
                    </ul>
                </div>
            </div>
            @query(['post_type' => 'post', 'posts_per_page' => -1])
                {{ Meta::get(Loop::id(), 'types') }}
                @if(has_post_thumbnail())
                    <!-- <img src="{{ Loop::thumbnailUrl() }}" alt="Image"/> -->
                @endif
            @endquery
            {{ APPVERSION }}

            <h1>Enhanced Query</h1>
            @query($query)
                <h3>{{ Loop::title() }}</h3>
                <p>{{ Loop::date('d/m/Y') }}</p>
            @endquery
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>