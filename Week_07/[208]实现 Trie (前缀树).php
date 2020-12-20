<?php
//实现一个 Trie (前缀树)，包含 insert, search, 和 startsWith 这三个操作。
//
// 示例: 
//
// Trie trie = new Trie();
//
//trie.insert("apple");
//trie.search("apple");   // 返回 true
//trie.search("app");     // 返回 false
//trie.startsWith("app"); // 返回 true
//trie.insert("app");   
//trie.search("app");     // 返回 true 
//
// 说明: 
//
// 
// 你可以假设所有的输入都是由小写字母 a-z 构成的。 
// 保证所有输入均为非空字符串。 
// 
// Related Topics 设计 字典树 
// 👍 488 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Trie
{
    private $tree;
    function __construct()
    {
        $this->tree = new TrieNode(null);
    }

    function insert($word)
    {
        $curNode = $this->tree;
        $n = strlen($word);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $word[$i];
                if (!isset($curNode->subs[$char])) {
                    $curNode->subs[$char] = new TrieNode($char);
                }
                $curNode = $curNode->subs[$char];
            }

            $curNode->isWord = 1;
        }
    }

    function search($word)
    {
        $curNode = $this->tree;
        $n = strlen($word);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $word[$i];
                if (!isset($curNode->subs[$char])) {
                    return false;
                }
                $curNode = $curNode->subs[$char];
            }

            return $curNode->isWord;
        }

        return true;
    }

    function startsWith($prefix)
    {
        $curNode = $this->tree;
        $n = strlen($prefix);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $prefix[$i];
                if (!isset($curNode->subs[$char])) {
                    return false;
                }
                $curNode = $curNode->subs[$char];
            }

            return true;
        }

        return true;
    }
}

class TrieNode
{
    public $val;
    public $subs;
    public $isWord;
    public function __construct($val = null)
    {
        $this->val = $val;
        $this->subs = [];
        $this->isWord = false;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
//leetcode submit region end(Prohibit modification and deletion)
