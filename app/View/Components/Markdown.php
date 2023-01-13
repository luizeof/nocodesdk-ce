<?php

namespace App\View\Components;

use Illuminate\View\Component;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class Markdown extends Component
{
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return function (array $data) {
            // $data['componentName'];
            // $data['attributes'];
            // $data['slot'];

            $config = [];

            // Configure the Environment with all the CommonMark and GFM parsers/renderers
            $environment = new Environment($config);
            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new GithubFlavoredMarkdownExtension());
            $environment->addExtension(new TaskListExtension());
            $environment->addExtension(new TableExtension());
            $environment->addExtension(new AutolinkExtension());

            $converter = new MarkdownConverter($environment);

            $data['slot'] = (string) $converter->convert($data['slot']);

            return (string) $converter->convert($data['slot']);
        };

        return view('components.markdown');
    }
}
