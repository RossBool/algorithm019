学习笔记

# 深度优先搜索和广度优先搜索

## BFS 代码模板

```js
const bfs = (root) => {
  let result = [], queue = [root]
  while (queue.length > 0) {
    let level = [], n = queue.length
    for (let i = 0; i < n; i++) {
      let node = queue.pop()
      level.push(node.val) 
      if (node.left) queue.unshift(node.left)
      if (node.right) queue.unshift(node.right)
    }
    result.push(level)
  }
  return result
};
```

# 贪心算法

## 总结
 - 企图找到局部的**最优解**
 - 根据已有的局部最优解，找到那个**全局最优解**
## 与动态规划区别：

- 对每个子问题的解决方案都做出选择；
- 不能回退；
- 不依赖上一个状态返回的结果；
- 不会影响后面的状态选择；
- 动态规划是会保存**之前的运算结果**，并根据之前的结果对当前进行选择，有**回退功能**。

# 二分查找

## 特性：

- 目标函数单调递增（递减）；
- 存在上下界；
- 能够通过**索引**访问。
