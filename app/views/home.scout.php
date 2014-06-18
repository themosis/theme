@include('header', array('prout' => 'Pschhhhit'))

    <h1>Hello {{ $name }}</h1>
    <p>Something new - {{ $var or 'Default value' }}</p>
    @{{ This is a comment
on multiple lines,
I hope it works }}
    <p>{{ Meta::get(1, 'author') }}</p>

    @if(2 == 3)
        <p>This is something true.</p>
    @else
        <p>Something is false.</p>
    @endif

    <ul>
    @foreach(array('red', 'green', 'blue') as $color)

        <li>{{{ ucfirst($color) }}}</li>

    @endforeach
    </ul>

    {{ Form::open() }}

    <p>{{ Form::label('field-id', 'My custom label:') }}</p>

    {{ Form::text('my-field', 'The saved value', array('id'  => 'field-id')) }}

    {{ Form::checkbox('enable-slideshow') }}

    <p>{{ Form::checkboxes('colors', array('blue', 'red', 'yellow')) }}</p>

    {{ Form::radio('beers', array('White', 'Brown', 'Black')) }}

    {{ Form::email('user-email') }}

    {{ Form::textarea('content', 'A super not so long text') }}

    <p>
        <?php
            // Simple select
            $select = Form::select('country', array(
                array('belgique', 'luxembourg', 'france')
            ), '1');

            echo($select);
        ?>
    </p>

    <p>
        <?php
            // Simple subgroup select
            $select = Form::select('country', array(
                'Europe'    => array('belgique', 'luxembourg', 'france'),
                'America'   => array('usa', 'canada', 'mexique')
            ), '3');

            echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple select with multiple
        $select = Form::select('country', array(
            array('belgique', 'luxembourg', 'france')
        ), array(0,2), array('multiple' => 'multiple'));

        echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple subgroup select with multiple
        $select = Form::select('country', array(
            'Europe'    => array('belgique', 'luxembourg', 'france'),
            'America'   => array('usa', 'canada', 'mexique')
        ), array(0,4), array('multiple' => 'multiple'));

        echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple select with custom values
        $select = Form::select('country', array(
            array(
                'bel' => 'belgique',
                'lux' => 'luxembourg',
                'fra' => 'france'
            )
        ), 'fra');

        echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple subgroup select with custom values - single
        $select = Form::select('country', array(
            'europe' => array(
                'bel' => 'belgique',
                'lux' => 'luxembourg',
                'fra' => 'france'
            ),
            'america' => array(
                'usa' => 'usa',
                'can' => 'canada',
                'mex' => 'mexique'
            )
        ), 'mex');

        echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple select with custom values - multiple
        $select = Form::select('country', array(
            array(
                'bel' => 'belgique',
                'lux' => 'luxembourg',
                'fra' => 'france'
            )
        ), 'lux', array('multiple' => 'multiple'));

        echo($select);
        ?>
    </p>

    <p>
        <?php
        // Simple subgroup select with custom values
        $select = Form::select('country', array(
            'europe' => array(
                'bel' => 'belgique',
                'lux' => 'luxembourg',
                'fra' => 'france'
            ),
            'america' => array(
                'usa' => 'usa',
                'can' => 'canada',
                'mex' => 'mexique'
            )
        ), array('bel', 'mex'), array('multiple' => 'multiple'));

        echo($select);
        ?>
    </p>

    <p>
        {{ Form::button('actionBtn', 'Click me!') }}

        {{ Form::submit('submitBtn', 'Submit') }}
    </p>

    {{ Form::close() }}

@include('footer')