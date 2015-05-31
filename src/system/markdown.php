<?php
/**
 * Markdown Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Markdown Class (view-model)
 * ======================
 * A wrapper for Cebe's markdown parser for a slightly simpler interface.
 * 
 * @see https://github.com/cebe/markdown
 */
class markdown {
	
	public  $use_html5;
	public  $keep_list_number;
	public  $enable_new_lines;
	private $instances;
	
	/**
	 * Sets up $this->instances
	 */
	public function __construct($use_html5 = TRUE, $keep_list_number = TRUE, $enable_new_lines = FALSE) {
		$this->instances = array(
			'standard' => NULL,
			'github' => NULL,
			'extra' => NULL
		);
		$this->use_html5        = $use_html5;
		$this->keep_list_number = $keep_list_number;
		$this->enable_new_lines = $enable_new_lines;
	}
	
	/**
	 * Parse markdown using the standard format
	 * 
	 * @param  string $markdown The Markdown you want to parse
	 * @return string           The resulting HTML
	 */
	public function parse($markdown) {
		$instance = $this->instances['standard'];
		if (empty($instance)) {
			$instance                      = new \cebe\markdown\Markdown();
			$instance->html5               = &$this->use_html5;
			$instance->keepListStartNumber = &$this->keep_list_number;
		}
		return $instance->parse($markdown);
	}
	
	/**
	 * Parse markdown using the github format
	 * 
	 * @param  string $markdown The Markdown you want to parse
	 * @return string           The resulting HTML
	 */
	public function parse_github($markdown) {
		$instance = $this->instances['github'];
		if (empty($instance)) {
			$instance                      = new \cebe\markdown\GithubMarkdown();
			$instance->html5               = &$this->use_html5;
			$instance->keepListStartNumber = &$this->keep_list_number;
			$instance->enableNewlines      = &$this->enable_new_lines;
		}
		return $instance->parse($markdown);
	}
	
	/**
	 * Parse markdown using the extra format
	 * 
	 * @param  string $markdown The Markdown you want to parse
	 * @return string           The resulting HTML
	 */
	public function parse_extra($markdown) {
		$instance = $this->instances['extra'];
		if (empty($instance)) {
			$instance                      = new \cebe\markdown\MarkdownExtra();
			$instance->html5               = &$this->use_html5;
			$instance->keepListStartNumber = &$this->keep_list_number;
		}
		return $instance->parse($markdown);
	}
}
