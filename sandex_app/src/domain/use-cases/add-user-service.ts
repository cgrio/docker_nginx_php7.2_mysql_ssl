import { UserModel, AddUserParams } from "@/domain/models/user";

export const ADD_USER_SERVICE = "ADD_USER_SERVICE"

export interface IAddUserService {
    addUserService: (data: AddUserParams) => Promise<UserModel>
}