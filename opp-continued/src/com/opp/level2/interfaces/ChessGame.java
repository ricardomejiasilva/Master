package com.opp.level2.interfaces;

public class ChessGame implements GamingConsole {

	@Override
	public void up() {
		System.out.println("mvoe up");

	}

	@Override
	public void down() {
		System.out.println("move down");

	}

	@Override
	public void left() {
		System.out.println("move left");

	}

	@Override
	public void right() {
		System.out.println("move right");

	}


}
