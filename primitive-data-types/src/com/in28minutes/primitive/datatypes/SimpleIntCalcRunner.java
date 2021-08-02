package com.in28minutes.primitive.datatypes;

public class SimpleIntCalcRunner {

	public static void main(String[] args) {
		SimpleIntCalc calculator = new SimpleIntCalc("4500.00", "7.5");
		java.math.BigDecimal totalValue = calculator.calculateTotalValue(5);
		System.out.println(totalValue);

	}

}
