package twosum

import (
	"slices"
	"testing"
)

func TestTwoSum(t *testing.T) {
	tests := []struct {
		name   string
		nums   []int
		target int
		want   []int
	}{
		{"match after a nonmatching pair", []int{9, 4, 6, 2}, 10, []int{1, 2}},
		{"duplicate values", []int{5, 5}, 10, []int{0, 1}},
		{"negative value and index zero", []int{-4, 8, 3}, -1, []int{0, 2}},
		{"skip self-pair", []int{5, 1, 9}, 10, []int{1, 2}},
	}

	for _, tc := range tests {
		t.Run(tc.name, func(t *testing.T) {
			got := twoSum(tc.nums, tc.target)
			slices.Sort(got)
			if !slices.Equal(got, tc.want) {
				t.Fatalf("twoSum(%v, %d) = %v; want indices %v", tc.nums, tc.target, got, tc.want)
			}
		})
	}
}
