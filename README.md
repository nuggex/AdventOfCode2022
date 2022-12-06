# I Like to suffer


# Performance testing

### Specs 
* PHP 8.1.13
* PHPBench 1.2.7
* Ryzen Threadripper 2950X 
* 64GB DDR4 @ 3200Mhz
* Gigabyte Designare X399 
* Opcache disabled
* Xdebug disabled
* 10 000 revs


# Day1 
### Part1 and 2 in same function
| iter | benchmark | subject    | set | revs  | mem_peak | time_avg  | comp_z_value | comp_deviation | 
| ------|-----------|------------|-----|-------|----------|-----------|--------------|---------------- |
| 0    | Day1Bench | benchPart1 |     | 10000 | 657,504b | 186.824μs | 0.00σ       |0.00%         | 


# Day2
| iter | benchmark | subject    | set | revs  | mem_peak | time_avg | comp_z_value | comp_deviation | 
|------|-----------|------------|-----|-------|----------|----------|--------------|----------------|
| 0    | Day2Bench | benchPart1 |     | 10000 | 665,968b | 88.019μs | 0.00σ        |0.00%         |
| 0    | Day2Bench | benchPart2 |     | 10000 | 665,968b | 83.016μs | 0.00σ        |0.00%         |

#Day3
| iter | benchmark | subject    | set | revs  | mem_peak | time_avg  | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|-----------|--------------|----------------|
| 0    | Day3Bench | benchPart1 |     | 10000 | 492,088b | 719.137μs | 0.00σ        |0.00%         |
| 0    | Day3Bench | benchPart2 |     | 10000 | 492,088b | 685.438μs | 0.00σ        |0.00%         |

#Day4
| iter | benchmark | subject    | set | revs  | mem_peak | time_avg     | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|--------------|--------------|----------------|
| 0    | Day4Bench | benchPart1 |     | 10000 | 546,224b | 4,257.328μs  | 0.00σ       |0.00%         |
| 0    | Day4Bench | benchPart2 |     | 10000 | 543,408b | 14,375.083μs | 0.00σ       |0.00%         |

#Day5

| iter | benchmark | subject    | set | revs  | mem_peak | time_avg  | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|-----------|--------------|----------------|
| 0    | Day5Bench | benchPart1 |     | 10000 | 756,608b | 941.389μs | 0.00σ        |0.00%         |
| 0    | Day5Bench | benchPart2 |     | 10000 | 756,608b | 621.572μs | 0.00σ        |0.00%         |


#Day6
| iter | benchmark | subject    | set | revs  | mem_peak | time_avg    | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|-------------|--------------|----------------|
| 0    | Day6Bench | benchPart1 |     | 10000 | 775,504b | 365.615μs   | 0.00σ        |0.00%         |
| 0    | Day6Bench | benchPart2 |     | 10000 | 842,320b | 1,042.904μs | 0.00σ        |0.00%         |