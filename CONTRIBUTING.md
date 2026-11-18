# Daily practice workflow

Use Go 1.26 or newer, PHP CLI 8.2 or newer, and Ruby with its standard YAML library. The tests and generator run without installing packages.

1. Create `problems/NNNN-slug/`, using the LeetCode ID padded to at least four digits and the slug from its URL. Use [the Two Sum folder](problems/0001-two-sum/) as the template for all seven files.
2. Fill in `meta.yml`. Use the numeric ID without padding and the official title. Use `easy`, `medium`, or `hard` for `difficulty`. Use a YAML list of lowercase, hyphenated pattern tags such as `hash-map` and `two-pointers` (or `[]` if none apply). Use `planned`, `in-progress`, `solved`, or `review` for `status`. Record `solved_at` as `YYYY-MM-DD` or `null` if the date is unknown. Include the time and space complexities and use `https://leetcode.com/problems/<slug>/` as the problem link.
3. Add a Go solution and table-driven tests in the same Go package. Add the PHP solution and a standalone `SolutionTest.php` that loads the solution and throws on failure. Each PHP test file runs in its own process.
4. Write `README.en.md` in English and `README.fa.md` in Persian. In each file, include Problem, Pattern, Intuition, Approach, Complexity, Go vs PHP notes, Pitfalls, and Related problems. Use the corresponding headings from the example files. Link to the official problem and summarize it in your own words. Use your own examples.
5. Add or update the problem in the [roadmap](roadmap/path.md) and keep its status in sync with the metadata. The roadmap order is your practice order.
6. From the repository root, run these commands:

   ```sh
   go test ./...
   bash -e -c 'for test_file in problems/*/SolutionTest.php; do php "$test_file"; done'
   ruby scripts/regenerate.rb
   ```

   The generator orders progress by problem ID and groups entries by tag in the pattern indexes. Keep prose outside the progress markers in the root README files and edit metadata to change generated rows.
7. Commit the problem folder, roadmap, and regenerated Markdown together. Use `solve: NNNN slug` for a completed problem (for example, `solve: 0001 two-sum`) and `review: NNNN slug` when revisiting one.
