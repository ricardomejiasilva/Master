package com.opp.level2;

public class FanRunner {

	public static void main(String[] args) {
		Fan fan = new Fan("Manu1", 0.34567, "green");
		fan.switchOn();
		fan.setSpeed((byte) 5);
		System.out.println(fan);
		fan.switchOff();
		System.out.println(fan);
	}

}
