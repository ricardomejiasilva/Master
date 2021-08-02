package com.functional.programing;

import java.util.List;

public class MethodRefencesRunner {

	public static void print(Integer num) {
		System.out.println(num);
	}

	public static void main(String[] args) {

		List.of("ant", "bat", "cat", "dog", "elephant").stream().map(s -> s.length())
				.forEach(s -> System.out.println(s));

		List.of("ant", "bat", "cat", "dog", "elephant").stream().map(String::length)
				.forEach(MethodRefencesRunner::print);

		Integer max = List.of(23, 43, 34, 45, 36, 48).stream().filter(n -> n % 2 == 0).max(Integer::compare).orElse(0);
		System.out.println(max);


	}

}
