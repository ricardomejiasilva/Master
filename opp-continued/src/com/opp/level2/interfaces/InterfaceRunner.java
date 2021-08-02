package com.opp.level2.interfaces;

interface Flyable {
	void fly();
}

class Bird implements Flyable {

	@Override
	public void fly() {
		System.out.println("with wings");

	}

}

class Aeroplane implements Flyable {

	@Override
	public void fly() {
		System.out.println("with fuel");

	}

}

public class InterfaceRunner {

	public static void main(String[] args) {
		Flyable[] flyingObjects = { new Bird(), new Aeroplane() };
		for (Flyable object : flyingObjects) {
			object.fly();
		}

	}
}
