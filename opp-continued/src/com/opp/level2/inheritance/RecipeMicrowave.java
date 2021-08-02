package com.opp.level2.inheritance;

public class RecipeMicrowave extends AbstractRecipe {

	@Override
	void getReady() {
		System.out.println("get materials");
		System.out.println("swtich on microwave");

	}

	@Override
	void doDish() {
		System.out.println("get stuff ready");
		System.out.println("put in microwave");

	}

	@Override
	void cleanUp() {
		System.out.println("clean");
		System.out.println("swtich off microwave");

	}


}
