package com.opp.level2.inheritance;

public class Recipe1 extends AbstractRecipe {

	@Override
	void getReady() {
		System.out.println("get materials");
		System.out.println("get utensils");

	}

	@Override
	void doDish() {
		System.out.println("do dish");

	}

	@Override
	void cleanUp() {
		System.out.println("clean");

	}


}
