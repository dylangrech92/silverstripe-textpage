<?php

class TextPage extends Page{

    private static $description = 'A simple page that returns as a text document';

    public function getCMSFields(){
        $baseLink = Controller::join_links (
            Director::absoluteBaseURL(),
            (self::config()->nested_urls && $this->ParentID ? $this->Parent()->RelativeLink(true) : null)
        );
        return new FieldList(
            new TabSet("Root",
                new Tab('Main',
                    SiteTreeURLSegmentField::create("URLSegment", $this->fieldLabel('URLSegment'))
                        ->setURLPrefix($baseLink)
                        ->setDefaultURL($this->generateURLSegment(_t(
                            'CMSMain.NEWPAGE',
                            array('pagetype' => $this->i18n_singular_name())
                        ))),
                    new TextareaField("Content", _t('TextPage.Text', "Text", 'Text Page Text Value'))
                )
            )
        );
    }
}

class TextPage_Controller extends Page_Controller{

    /**
     * Set the Content-type of this page as text/plain and simply return
     * the Content field
     *
     * @return string
     */
    public function index(){
        $this->response->addHeader('Content-Type', 'text/pain; charset="utf-8"');
        return $this->render();
    }

}
