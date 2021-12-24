<?php

const USER_FILE = "data/users.csv";
const LOG_FILE = "logs/log.app";

function run()
{
    $request = getRequest();

    if ($request) {
        $newUser = getUserData($request);
        $success = addUser($newUser);
        $users = getUsers();
        sendResponse($success, $users);
    } else {
        resetApplication();
        include 'view/member_club.php';
    }
}

function sendResponse($success, $users): void
{
    if ($success) {
        writeToLog("response", "success");
        echo json_encode($users);
    } else {
        writeToLog("response", "error: email already exists");
        echo json_encode("");
    }
}

function resetApplication(): void
{
    if (file_exists(USER_FILE)) {
        unlink(USER_FILE);
    }
    if (file_exists(LOG_FILE)) {
        unlink(LOG_FILE);
    }
}

function getRequest(): array|bool
{
    if (count($_POST) === 0) {
        return false;
    }
    writeToLog("request", implode(";", $_POST));
    return [htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["email"])];
}

function getUserData($request): array
{
    return ["name" => $request[0],
        "email" => $request[1],
        "date" => date("d.m.Y")];
}

function addUser($newUser): bool
{
    $users = getUsers();
    $userExists = isUser($newUser["email"], $users);
    if (!$userExists) {
        writeUserRecord($newUser);
        return true;
    }
    return false;
}

function writeUserRecord($newUser): void
{
    $userFile = fopen(USER_FILE, 'a+');
    fputcsv($userFile, array_values($newUser), "|", "'");
    fclose($userFile);
}

function isUser($email, $userList): bool
{
    return in_array($email, array_column($userList, 1), true);
}

function getUsers(): array
{
    $userList = [];
    $userFile = fopen(USER_FILE, 'a+');
    while (($data = fgetcsv($userFile, 0, "|", "'", "\\")) !== FALSE) {
        $userList[] = $data;
    }
    fclose($userFile);
    return $userList;
}

function writeToLog($type, $data): void
{
    $file = fopen(LOG_FILE, 'a');
    $logString = date('Y-m-d H:i:s') . " $type $data\n";
    fwrite($file, $logString);
    fclose($file);
}