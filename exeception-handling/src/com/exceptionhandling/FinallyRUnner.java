package com.exceptionhandling;

import java.util.Scanner;

public class FinallyRUnner {

	public static void main(String[] args) {
		Scanner scanner = null;
		try {
			scanner = new Scanner(System.in);
		int[] numbers = { 12, 3, 4, 5 };

		int number = numbers[5];

	} catch (Exception e) {
		e.printStackTrace();
	} finally {
		System.out.println("before Scanner Close");
		scanner.close();
	}

	System.out.println("Just before Closing out Main");

	}

}
