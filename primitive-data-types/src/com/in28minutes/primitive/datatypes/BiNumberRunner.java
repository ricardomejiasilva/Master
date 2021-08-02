package com.in28minutes.primitive.datatypes;

public class BiNumberRunner {

	public static void main(String[] args) {
		BiNumber numb = new BiNumber(2, 3);

		System.out.println(numb.add());
		System.out.println(numb.multiply());

		numb.doubleValue();

		System.out.println(numb.getA());
		System.out.println(numb.getB());
	}
}
