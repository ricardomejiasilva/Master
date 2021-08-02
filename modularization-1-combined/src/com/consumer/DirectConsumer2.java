package com.consumer;

import java.util.List;
import java.util.logging.Logger;

import com.sorting.algorithm.BubbleSort;

public class DirectConsumer2 {

	private static Logger logger = Logger.getLogger(DirectConsumer2.class.getName());

	public static void main(String[] args) {
		BubbleSort util = new BubbleSort();
		List<String> sorted = util.sort(List.of("ranga", "ravi", "sasha", "tom"));
		logger.info(sorted.toString());
	}
}
