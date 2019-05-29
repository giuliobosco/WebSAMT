<?php
/*
 * The MIT License
 *
 * Copyright 2018 giuliobosco.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


/**
 * @author giuliobosco
 * @version 1.0 (2019-05-14 - 2019-05-14)
 */
class LibrarySession {

	private static $username = "username";

	private static $times = "times";

	public static function isCookieSet(): bool {
		if (isset($_COOKIE[self::$username]) && isset($_COOKIE[self::$times])) {
			return true;
		}

		header('location:'.URL.'home/login');
		return false;
	}

	public static function clearCookie():void {
		if (self::isCookieSet()) {
			setcookie(self::$times, '', time() - 1);
			setcookie(self::$username, '', time() - 1);
		}

		header('location:' . URL . 'home/login');
	}

	public static function setCookie(string $username): void {
		self::setCookieTimes(0);
		setcookie(self::$username, $username, time() + 3600);
		header('location:' . URL . 'loans/index');
	}

	public static function getCookieUsername() {
		if (self::isCookieSet()) {
			return $_COOKIE[self::$username];
		}

		return null;
	}

	public static function getCookieTimes() {
		if (self::isCookieSet()) {
			return $_COOKIE[self::$times];
		}

		return null;
	}

	public static function setCookieTimes(int $times) {
		setcookie(self::$times, strval($times), time() + 3600);
	}

	public static function increaseCookieTimes():void {
		$times = self::getCookieTimes();
		$times++;
		self::setCookieTimes($times);
	}

}