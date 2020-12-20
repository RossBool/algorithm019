<?php
//给定一个 m x n 二维字符网格 board 和一个单词（字符串）列表 words，找出所有同时在二维网格和字典中出现的单词。
//
// 单词必须按照字母顺序，通过 相邻的单元格 内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母在一个单词中不允许被重复使
//用。 
//
// 
//
// 示例 1： 
//
// 
//输入：board = [["o","a","a","n"],["e","t","a","e"],["i","h","k","r"],["i","f","l"
//,"v"]], words = ["oath","pea","eat","rain"]
//输出：["eat","oath"]
// 
//
// 示例 2： 
//
// 
//输入：board = [["a","b"],["c","d"]], words = ["abcb"]
//输出：[]
// 
//
// 
//
// 提示： 
//
// 
// m == board.length 
// n == board[i].length 
// 1 <= m, n <= 12 
// board[i][j] 是一个小写英文字母 
// 1 <= words.length <= 3 * 104 
// 1 <= words[i].length <= 10 
// words[i] 由小写英文字母组成 
// words 中的所有字符串互不相同 
// 
// Related Topics 字典树 回溯算法 
// 👍 299 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class TrieNode {
    public $childrens = [];
    public $word = null;
}

class Solution {
    private $root;
    private $board;
    private $result = [];

    private $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];

    public function __construct() {
        $this->root = new TrieNode();
    }

    private function insertWord($word) {
        $curNode = $this->root;
        $chars = str_split($word);
        foreach ($chars as $char) {
            if (!isset($curNode->childrens[$char])) {
                $curNode->childrens[$char] = new TrieNode();
            }
            $curNode = $curNode->childrens[$char];
        }
        $curNode->word = $word;
    }

    function findWords($board, $words) {
        $this->board = $board;
        $this->result = [];
        // 构造前缀树
        foreach ($words as $word)
            $this->insertWord($word);

        $rowLen = count($board);
        $colLen = count($board[0]);
        for ($row = 0; $row < $rowLen; $row++) {
            for ($col = 0; $col < $colLen; $col++) {
                if (isset($this->root->childrens[$board[$row][$col]]))
                    $this->DFS($row, $col, $this->root);
            }
        }
        return array_unique($this->result);
    }

    private function DFS($row, $col, $parent) {
        $rowLength = count($this->board);
        $colLength = count($this->board[0]);
        $char = $this->board[$row][$col];
        $curNode = $parent->childrens[$char];
        // 终止条件
        if ($curNode->word !== null) {
            $this->result[] = $curNode->word;
        }
        $this->board[$row][$col] = '#';
        for ($i = 0; $i < 4; $i++) {
            $newRow = $row + $this->directions[$i][0];
            $newCol = $col + $this->directions[$i][1];
            if ($newRow < 0 || $newRow >= $rowLength || $newCol < 0 || $newCol >= $colLength)
                continue;
            if (isset($curNode->childrens[$this->board[$newRow][$newCol]]))
                $this->DFS($newRow, $newCol, $curNode);
        }
        $this->board[$row][$col] = $char;
        // 删除末端节点
        if (empty($curNode->childrens)) {
            unset($parent->childrens[$char]);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
