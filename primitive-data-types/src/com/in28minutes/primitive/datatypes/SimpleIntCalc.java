package com.in28minutes.primitive.datatypes;

import java.math.BigDecimal;

public class SimpleIntCalc {
	BigDecimal a;
	BigDecimal b;

	public SimpleIntCalc(String a, String b) {
		this.a = new BigDecimal(a);
		this.b = new BigDecimal(b).divide(new BigDecimal(100));

	}

	public BigDecimal calculateTotalValue(int c) {
		BigDecimal noYears = new BigDecimal(c);
		BigDecimal totalValue = a.add(a.multiply(b).multiply(noYears));
		return totalValue;
	}


}
