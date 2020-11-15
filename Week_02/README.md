学习笔记

##### 深度优先搜索 （DFS）

- 前序遍历
- 中序遍历
- 后序遍历

#####广度优先搜索（BFS）

深度优先搜索**递归法**模板

```php
// 前序
  public function funcTest(&$res, $root)
    {
        if (!$root) {
            return [];
        }
        array_push($res, $root->val); //根
        $this->funcTest($res, $root->left); //左
        $this->funcTest($res, $root->right); //右
        return $res;
    }
```

```php
// 中序
  public function funcTest(&$res, $root)
    {
        if (!$root) {
            return [];
        }
         $this->funcTest($res, $root->left); //左
        array_push($res, $root->val); //根
        $this->funcTest($res, $root->right); //右
        return $res;
    }
```

```php
 // 后序
  public function funcTest(&$res, $root)
    {
        if (!$root) {
            return [];
        }

        $this->funcTest($res, $root->left); //左
        $this->funcTest($res, $root->right); //右
         array_push($res, $root->val); //根
        return $res;
    }
```




## 前序遍历

- 每拿到一个 节点 就把它保存在栈中。
- 继续对这个节点的 左子树 重复 **过程1**，直到左子树为 **空**。
- 因为保存在 **栈** 中的节点都遍历了**左子树** 但是没有遍历**右子树**，所以对栈中节点出栈并对它的 **右子树** 重复 **过程1**。




## 后序遍历

- 迭代法思路
  - 根据栈先进后出的第思想，首先依次遍历到右子树，然后一步步入栈，直到右子树为空，这是栈顶元素**cur**开始弹出，获取对应的值入**结果集**，然后依次取**cur**的左子树，入栈，弹出元素，直到栈为空，然偶胡奖结果集**反向输出**。

### 总结

第二周的课程有点跟不上，想深度优先搜索遍历的的迭代法看得云里雾里，但是还是要继续啃下来，这些遍历的题目需要不断的训练和总结，有些解题方法是要背下来的，然后需要慢慢理解，类似后面的优先队列，大顶堆和小顶堆的题目还需要不断加强训练。