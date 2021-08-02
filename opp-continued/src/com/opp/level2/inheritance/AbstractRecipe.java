package com.opp.level2.inheritance;

public abstract class AbstractRecipe {

	public void execute() {
		getReady();
		doDish();
		cleanUp();
	}

	abstract void getReady();

	abstract void doDish();

	abstract void cleanUp();
	// prepare
	// recipe
	// clean

}
