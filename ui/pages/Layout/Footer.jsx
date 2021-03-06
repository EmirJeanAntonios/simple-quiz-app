import Link from "next/link";
import React from "react";

const Footer = () => {
  return (
    <footer className="flex justify-between py-5">
      <h3 className="text-lg font-bold cursor-pointer">
        <Link href="/">Quiz App</Link>
      </h3>
      <h4 className="text-md">Made By Emir Jean Antonios</h4>
    </footer>
  );
};

export default Footer;
