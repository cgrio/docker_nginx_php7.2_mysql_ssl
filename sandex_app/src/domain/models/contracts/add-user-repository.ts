import { UserModel, AddUserParams } from "@/domain/models/user";

export const ADD_USER_REPOSITORY = "ADD_USER_REPOSITORY"

export interface IAddUserRepository {
    addUserRepository: (data: AddUserParams) => Promise<UserModel>;
}