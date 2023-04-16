<?php

// This file defines the TreeView class.

namespace Roblox\Web\AspNet;

class TreeView {
	static function stampBulletTree(&$tree) {
		foreach ($tree as &$item) {
			if (isset($item['children']) && $item['children'] !== null && $item['children'] !== []) {
				// Item has children (aka not empty!!!)
				$item['icon'] = "jstree-bullet-black";
				TreeView::stampBulletTree($item['children']);
			}else {
				$item['icon'] = "jstree-bullet-grey";
			}
		}
		unset($item);
	}

	static function generateBulletTree(&$tree, $pageSelect = false) {
		$buffer_tree = $tree;
		$tree = [];
		// Gets the current page's URL
		$pageUrl = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
		foreach ($buffer_tree as $key => $item) {
			$href = $item[0];
			$selected = $href == $pageUrl;
			if (isset($item[1]) && $item[1] !== null && $item[1] !== []) {
				// If the element contains children, push them to the tree as well
				TreeView::generateBulletTree($item[1]);
			}
			// Push the text and link to the element on the tree
			array_push($tree, ["text" => $key, "a_attr" => ["href" => $href == "" ? "/Default.aspx" : $href], "children" => $item[1] ?? [], "state" => ["selected" => $selected]]);
		}
		unset($item);
		TreeView::stampBulletTree($tree);
	}
}

// EOF