import Link from "next/link";
import React from "react";

const Header = () => {
  return (
    <header className="py-5 ">
      <div className="title">
        <Link href="/">
          <h1 className="text-3xl font-bold cursor-pointer">Quiz App</h1>
        </Link>
      </div>
    </header>
  );
};

export default Header;
