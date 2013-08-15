<?php

// markdown config file

_require_once(__DIR__.'/../3rd-party/markdown/Markdown.php');
_require_once(__DIR__.'/../3rd-party/markdown/MarkdownExtra.php');
if($_lai->plugin->register('markdown',new Michelf\MarkdownExtra)){
  $_lai->markdown = new Michelf\MarkdownExtra;
}
