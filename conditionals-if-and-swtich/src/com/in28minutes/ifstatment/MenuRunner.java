package com.in28minutes.ifstatment;

import java.util.Scanner;

public class MenuRunner {

	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		
		System.out.println("Eneter 1: ");
		int number1 = scanner.nextInt();
		System.out.println("The num entered is - " + number1);

		System.out.println("Eneter 2: ");
		int number2 = scanner.nextInt();
		System.out.println("The num entered is - " + number2);

		System.out.println("1 - Add \n2 - Subtract \n3 - Divide \n4 - multiply \nChoose Operation");
		int operator = scanner.nextInt();

		oprNestedIfElse(number1, number2, operator);

	}

	private static void oprNestedIfElse(int number1, int number2, int operator) {
		if (operator == 1) {
			int r = number1 + number2;
			System.out.println("Result = " + r);
		} else if (operator == 2) {
			int r = number1 - number2;
			System.out.println("Result = " + r);
		} else if (operator == 3) {
			int r = number1 / number2;
			System.out.println("Result = " + r);
		} else if (operator == 4) {
			int r = number1 * number2;
			System.out.println("Result = " + r);
		} else {
			System.out.println("Invalid");
		}
	}

	private static void oprNestedSwitch(int number1, int number2, int operator) {
		switch (operator) {
		case 1:
			System.out.println("Result = " + (number1 + number2));
			break;
		case 2:
			System.out.println("Result = " + (number1 - number2));
			break;
		case 3:
			System.out.println("Result = " + (number1 / number2));
			break;
		case 4:
			System.out.println("Result = " + (number1 * number2));
			break;
		default:
			System.out.println("Invalid");
		}
	}
}
