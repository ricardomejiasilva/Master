package com.functional.programing;

import java.util.List;
import java.util.function.Predicate;

class EvenNumPredicate implements Predicate<Integer> {

	@Override
	public boolean test(Integer num) {
		return num % 2 == 0;
	}
}

public class LambdaBSRunner {

	public static void main(String[] args) {
		List.of(23, 43, 34, 45, 36, 48).stream().filter(n -> n % 2 == 0).forEach(e -> System.out.println(e));

		List.of(23, 43, 34, 45, 36, 48).stream().filter(new EvenNumPredicate()).forEach(e -> System.out.println(e));

	}

}
