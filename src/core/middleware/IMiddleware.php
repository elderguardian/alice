<?php

interface IMiddleware
{
    function canPass(): bool;
    function onFail(): string;
}