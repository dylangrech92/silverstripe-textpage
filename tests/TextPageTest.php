<?php

/**
 * Class TextPageTest
 * Run tests to check the Text Page and it's functionality
 *
 * @method void assertEquals(mixed $param1, mixed $param2)
 */
class TextPageTest extends SapphireTest {

    public static $fixture_file = 'fixtures/TextPageTest.yml';

    /**
     * Test that the page is saved in the DB and it's response does not include any html markup
     */
    public function testCreation(){
        $this->objFromFixture('TextPage', 'test');

        $controller = TextPage_Controller::create(TextPage::get()->first());
        $render     = trim($controller->render()->value);
        $this->assertEquals( $render, 'Some text' );
        $this->assertEquals( strip_tags($render), $render );
    }
}


