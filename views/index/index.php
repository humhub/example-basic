<?php

use acmeCorp\humhub\modules\assets\Assets;
use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('ExampleBasicModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("example-basic", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('ExampleBasicModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Example-basic</strong> <?= Yii::t('ExampleBasicModule.base', 'overview') ?></div>
                <div class="panel-body">

                    <p><?= Yii::t('ExampleBasicModule.base', 'Hello World!') ?></p>

                    <?= Button::primary(Yii::t('ExampleBasicModule.base', 'Say Hello!'))->action("example-basic.hello")->loader(false); ?>
                </div>
            </div>
            <div class="panel panel-default" id="content-formatting">
                <div class="panel-heading">
                    Content Formatting
                </div>
                <div class="panel-body">


                    <p class="lead">
                        This is a lead paragraph. (lead class)
                    </p>

                    <p>
                        This is an <b>ordinary paragraph</b> that is <i>long enough</i> to wrap to <u>multiple lines</u>
                        so that you can see how the line spacing looks.
                    </p>

                    <p>
                        <small>
                            This is text in a <code>small (code tag)</code> wrapper.
                            <abbr title="No Big Deal">NBD (Abbr Tag)</abbr>, right?
                        </small>
                    </p>

                    <hr>

                    <address class="col-6">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">
                            P:</abbr>
                        (123) 456-7890
                        <a href="mailto:#">first.last@example.com</a>
                    </address>

                    <hr>

                    <blockquote>
                        Here's what a blockquote looks like in Bootstrap. <small>Use <code>small</code> to identify the
                            source.</small>
                    </blockquote>

                    <hr>

                    <div class="col-6">
                        <ul>
                            <li>Normal Unordered List</li>
                            <li>Can Also Work
                                <ul>
                                    <li>With Nested Children</li>
                                </ul>
                            </li>
                            <li>Adds Bullets to Page</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ol>
                            <li>Normal Ordered List</li>
                            <li>Can Also Work
                                <ol>
                                    <li>With Nested Children</li>
                                </ol>
                            </li>
                            <li>Adds Bullets to Page</li>
                        </ol>
                    </div>

                    <hr/>

<pre>function preFormatting() {
    // looks like this;
    var something = somethingElse;
    return true;
}</pre>
                </div>
            </div>
            <div class="panel panel-default" id="tables">
                <div class="panel-heading">
                    Tables
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Tables
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Michael
                            </td>
                            <td>
                                Are formatted like this
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                Lucille
                            </td>
                            <td>
                                Do you like them?
                            </td>
                        </tr>
                        <tr class="success">
                            <td>
                                3
                            </td>
                            <td>
                                Success
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr class="danger">
                            <td>
                                4
                            </td>
                            <td>
                                Danger
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                                5
                            </td>
                            <td>
                                Warning
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                6
                            </td>
                            <td>
                                Active
                            </td>
                            <td>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    
                    <br />
                    
                    <p>Another table style:</p>
                    
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Tables
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Michael
                            </td>
                            <td>
                                This one is bordered and condensed
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                Lucille
                            </td>
                            <td>
                                Do you still like it?
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Panel-Heading</div>
                <div class="panel-body">
                    <h1>Heading 1 (H1)</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et
                        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                        rebum. Stet
                        clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <p> Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                        aliquyam erat,
                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                        gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

                    <h2>Heading 2 (H2)</h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et dolore magna aliquyam erat. <br/>
                        <strong>Sed diam voluptua.</strong><br/> At vero eos et accusam et justo duo dolores et ea
                        rebum.
                        Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                        amet.
                    </p>
                    <ul>
                        <li>Element 1</li>
                        <li>Element 2</li>
                        <li>Element 3</li>
                    </ul>
                    <p>P In Div. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                    <h3>Heading 3 (H3)</h3>
                    <p>Lorem ipsum dolor sit amet, <a href="#">consetetur sadipscing elitr</a>, sed diam nonumy eirmod
                        tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
                        justo
                        duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                        sit
                        amet.
                        Lorem ipsum dolor sit amet.</p>

                    <h4>Heading 4 (H4)</h4>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et
                        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                        rebum. Stet
                        clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                        sit
                        amet.</p>

                    <h5>Heading 5 (H5)</h5>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Panel-Heading: Bootstrap Elements</div>
                <div class="panel-body">

                    <div class="alert alert-warning">
                        Warning Alert
                    </div>

                    <div class="alert alert-info">
                        Info Alert
                    </div>

                    <div class="alert alert-success">
                        Success Alert
                    </div>

                    <div class="alert alert-danger">
                        Danger Alert
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Example</strong> basic</div>
                <div class="panel-body">

                </div>
            </div>
        </div>


    </div>
</div>


