# HSA L21: Profiling

## Overview
This is an example project to show how to profile Binary Search Tree.

### Task:
* Implement Binary Search Tree class and operations of insert/delete/search.
* Profile space usage and time consumption.

## Getting Started

### Preparation

1. Run the docker containers.
```bash
  docker-compose up -d
```

Be sure to use ```docker-compose down -v``` to clean up after you're done with tests.

2. Check that php-spx is installed and works correctly.
```bash
docker exec -it php SPX_ENABLED=1 composer install
```

## Test results

### Insert
Run the benchmark tool:
```bash
docker exec -it php SPX_ENABLED=1 SPX_AUTO_START=0 php bstInsert.php --bst-size=100
```
NOTE: bst-size parameter is a Binary Search Tree size. By default, it is 10.

| BST Size | Time Complexity | Space Complexity |
|---|---|---|
| 100 | 1.13s | 55.7KB |
| 1000 | 2.77s | 557.3KB |
| 5000 | 13.27s | 2.7MB |
| 10000 | 23.15s | 5.5MB |

### Search
Run the benchmark tool:
```bash
docker exec -it php SPX_ENABLED=1 SPX_AUTO_START=0 php bstSearch.php --bst-size=100
```
NOTE: bst-size parameter is a Binary Search Tree size. By default, it is 10.

| BST Size | Time Complexity | Space Complexity |
|---|---|---|
| 100 | 1.07s | 320B |
| 1000 | 2.24s | 3.2KB |
| 5000 | 10.34s | 16KB |
| 10000 | 25.06s | 32KB |

### Delete
Run the benchmark tool:
```bash
docker exec -it php SPX_ENABLED=1 SPX_AUTO_START=0 php bstDelete.php --bst-size=100
```
NOTE: bst-size parameter is a Binary Search Tree size. By default, it is 10.

| BST Size | Time Complexity | Space Complexity |
|---|---|---|
| 100 | 984.9ms | 400B |
| 1000 | 1.79s | 4.1KB |
| 5000 | 7.25s | 21.7KB |
| 10000 | 14.92s | 40.3KB |


## Complexity

| Type             | Big O     |
|------------------|-----------|
| Time Complexity  | O(log(n)) |
| Space Complexity | O(n)      |