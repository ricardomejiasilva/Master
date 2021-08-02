package com.in28minutes.primitive.datatypes;

public class BiNumber {
	private int a;
	private int b;

	public int getA() {
		return a;
	}

	public void setA(int a) {
		this.a = a;
	}

	public int getB() {
		return b;
	}

	public void setB(int b) {
		this.b = b;
	}

	public BiNumber(int a, int b) {
		this.a = a;
		this.b = b;
	}

	public int add() {
		return a + b;
	}

	public int multiply() {
		return a * b;
	}

	public void doubleValue() {
		this.a *= 2;
		this.b *= 2;
	}
}
