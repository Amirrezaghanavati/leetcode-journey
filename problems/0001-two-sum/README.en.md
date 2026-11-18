# 0001 · Two Sum

[Persian edition](README.fa.md)

## Problem

Find two different positions in a list whose values add up to a given target. Return the positions in either order. The input guarantees one valid pair. [View the problem on LeetCode](https://leetcode.com/problems/two-sum/).

## Pattern

Use a hash map from each previously seen value to its index.

## Intuition

Once you know one value, subtraction tells you exactly what the other value needs to be. A hash lookup can tell you whether that complement has already appeared.

## Approach

1. Start with an empty map.
2. For each value, look up `target - value` in the map.
3. If it exists, return its stored index and the current index. Otherwise, store the current value and index.

For `[9, 4, 6, 2]` with target `10`, the first two values are stored. At index `2`, the value `6` needs `4`. The map gives index `1`, so the answer is `[1, 2]`. When the scan reaches the later member of a valid pair, the earlier member is already in the map.

## Complexity

- Expected time `O(n)`, with one pass and expected constant-time hash operations.
- Extra space `O(n)`, since the map may hold one entry per input value.

## Go vs PHP notes

- Go uses `map[int]int` and the `index, ok` lookup to distinguish an absent key from a stored index of `0`.
- PHP uses an associative array with integer keys. `isset` works here because every stored index is a non-null integer, including `0`.

## Pitfalls

- Look up the complement before inserting the current value to avoid pairing an element with itself.
- Equal values can form a valid pair at different positions. For `[5, 5]` and target `10`, the second `5` finds the first.
- Return the indices. The test cases accept either order.

## Related problems

- [167. Two Sum II](https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/) uses sorted input, which makes a two-pointer scan possible.
- [15. 3Sum](https://leetcode.com/problems/3sum/) extends the idea to triplets and adds duplicate handling.
