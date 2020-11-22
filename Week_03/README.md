学习笔记

## 范型型递归，树的递归

### 递归的实现
```
// 泛型递归模板

// recursion terminator

// process logic  in the level

//drill down

//reverse the current level status if need

```

### 分治递归

```python
# Python
def divide_conquer(problem, param1, param2, ...): 
  # recursion terminator 
  if problem is None: 
	print_result 
	return 

  # prepare data 
  data = prepare_data(problem) 
  subproblems = split_problem(problem, data) 

  # conquer subproblems 
  subresult1 = self.divide_conquer(subproblems[0], p1, ...) 
  subresult2 = self.divide_conquer(subproblems[1], p1, ...) 
  subresult3 = self.divide_conquer(subproblems[2], p1, ...) 
  …

  # process and generate the final result 
  result = process_result(subresult1, subresult2, subresult3, …)
	
  # revert the current level states
```

## 分治 回溯

### 回溯的实现和特性 
- 回溯采用的是一种是错的方法，他尝试分步的去解决一个问题，在分布解决问题的过程中，通过尝试不用的分步解答来寻找那个正确的结果。
- 回溯法一般都是采用**递归**方法来解答，反复重复上述的步骤后可能出现两种情况：
 - 找到一个可能存在的正确的答案。
 - 最坏情况 ，时间复杂度为**指数**。
 - 在尝试了所有的分步解答步骤后，宣告该问题没有答案。