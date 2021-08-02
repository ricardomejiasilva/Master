package com.in28minutes.oops;

public class BookRunner {

	public static void main(String[] args) {
		Book artOfComputerProgramming = new Book(100);
		Book effectiveJava = new Book(20);
		Book cleanCode = new Book(30);

		System.out.println(cleanCode.getCopies());

		artOfComputerProgramming.noOfCopies = 100;
		effectiveJava.noOfCopies = 50;
		cleanCode.noOfCopies = 40;

		cleanCode.increaseCopies(60);
	}

}
