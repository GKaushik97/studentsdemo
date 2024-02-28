<?php

namespace App\Controllers;

class Content extends BaseController
{
    public function __construct()
    {
        // Constructor
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Content',
            'layout' => 1,
            'page_title' => 'Content',
            'content' => 'Index Page<br><a href="'. WEBROOT .'content">Pages</a>',
            'js' => [],
            'css' => [],
        );
        return view('template/default', $data);
    }

    /**
     * List all pages
     */
    public function pages()
    {
        $data = array(
            'title' => 'Content Pages',
            // 'page_layout' => 1,
            'page_title' => 'Content Pages',
            // 'content' => view('content/contents', $pData, ['debug' => false]),
            'js' => [],
            'css' => [],
        );
        $contentModel = model('ContentModel');
        $data['contents'] = $contentModel->find();
        // return view('template/template', $data);
        return view('content/pages', $data);
    }

    /**
     * Page details
     */
    public function view($id = 1) : string
    {
        $data = array(
            'title' => 'Content',
            'page_title' => 'Content Page details',
            'breadcrumb' => [['name' => 'Content Pages', 'url' => 'content/pages']],
            'js' => [],
            'css' => [],
        );
        $contentModel = model('ContentModel');
        $page_contents = $contentModel->find($id);
        $data['content'] = $page_contents['content'];
        return view('content/content', $data);
    }

    public function test() : int
    {
        return 10;
    }
}